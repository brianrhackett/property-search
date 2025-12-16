
<h1>Search Properties</h1>

<?php
	echo $this->Form->create(null, ['type' => 'get']);
	echo $this->Form->control('q', ['value' => $query, 'label' => false]);
	echo $this->Form->button('Search');
	echo $this->Form->end();
?>

<hr>

<h2>Properties</h2>
<?php if( $properties->count() > 0 ):?>
	<div class="row my-4">
		<?php foreach ($properties as $property): ?>
				<div class="col-12 col-md-6 col-lg-3 listing-col">
					<a href="<?php echo $this->Url->build(['controller' => 'Properties', 'action' => 'view', $property->id]);?>">
						<h3><?php echo h($property->title);?></h3>
						
						<div class="img-wrap">
							<p class="price mb-0">$<?php echo number_format($property->price, 2); ?></p>
							<img
								src="/uploads/properties/<?php echo $property->id; ?>/<?php echo h($property->property_photos[0]->filename); ?>"
							>
						</div>
					</a>
				</div>
		<?php endforeach; ?>
	</div>
<?php else:?>
<p>No properties found.</p>
<?php endif;?>