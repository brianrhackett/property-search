
<h1><?php echo h($property->title);?></h1>

<p><?php echo nl2br(h($property->description)); ?></p>

<p>
    <strong>Price:</strong>
    $<?php echo number_format($property->price, 2); ?>
</p>

<hr>

<h3>Photos</h3>

<?php if (!empty($property->property_photos)): ?>
	<div class="gallery">
		<?php foreach ($property->property_photos as $photo): ?>
			<a
				href="/uploads/properties/<?= $property->id ?>/<?= h($photo->filename) ?>"
				class="glightbox col-12 col-md-6 col-lg-3"
				data-gallery="property"
			>
				<img
					src="/uploads/properties/<?= $property->id ?>/<?= h($photo->filename) ?>"
					alt="Property photo"
				>
			</a>
		<?php endforeach; ?>
	</div>
<?php else: ?>
    <p>No photos uploaded.</p>
<?php endif; ?>

<p>
    <?php echo $this->Html->link('← Back to search', ['action' => 'search']); ?>
</p>