<?php
namespace App\Controller;

use Intervention\Image\ImageManager;

class PropertiesController extends AppController
{
    public function add()
    {
        $property = $this->Properties->newEmptyEntity();

        if ($this->request->is('post')) {
            $property = $this->Properties->patchEntity(
                $property,
                $this->request->getData()
            );

            if ($this->Properties->save($property)) {
                $this->_handleUploads($property->id);
                return $this->redirect(['action' => 'search']);
            }
        }

        $this->set(compact('property'));
    }

    public function search()
    {
        $query = trim((string)$this->request->getQuery('q'));

        $properties = $this->Properties
            ->find()
            ->contain(['PropertyPhotos']);
			
		if($query !== '') {			
            $properties->where(function ($exp) use ($query) {
                return $exp->like('title', "%$query%");
            });
		}
        $this->set(compact('properties', 'query'));
    }

	public function view(int $id)
	{
		$property = $this->Properties->find()
			->contain(['PropertyPhotos'])
			->where(['Properties.id' => $id])
			->firstOrFail();

		$this->set(compact('property'));
	}

    private function _handleUploads(int $propertyId): void
	{
		$uploadedFiles = $this->request->getUploadedFiles();

		if (empty($uploadedFiles['photos'])) {
			return;
		}

		$files = $uploadedFiles['photos'];

		// Normalize to array
		if (!is_array($files)) {
			$files = [$files];
		}

		$basePath = WWW_ROOT . 'uploads/properties/' . $propertyId;

		if (!is_dir($basePath)) {
			mkdir($basePath, 0755, true);
		}

		$manager = \Intervention\Image\ImageManager::gd();

		foreach ($files as $file) {
			if (
				!$file instanceof \Psr\Http\Message\UploadedFileInterface ||
				$file->getError() !== UPLOAD_ERR_OK ||
				$file->getSize() === 0
			) {
				continue;
			}

			// Validate MIME
			$mime = $file->getClientMediaType();
			if (!in_array($mime, ['image/jpeg', 'image/png'], true)) {
				continue;
			}

			$tmpPath = $file->getStream()->getMetadata('uri');

			if (!is_readable($tmpPath)) {
				continue;
			}

			$filename = uniqid('', true) . '.jpg';
			$destination = $basePath . '/' . $filename;

			$manager
				->read($tmpPath)
				->scaleDown(1200, 800)
				->toJpeg(85)
				->save($destination);

			$photo = $this->Properties->PropertyPhotos->newEntity([
				'property_id' => $propertyId,
				'filename' => $filename,
			]);

			$this->Properties->PropertyPhotos->saveOrFail($photo);
		}
	}

}
