
<h1>Add Property</h1>

<?php
	echo $this->Form->create($property, ['type' => 'file']);
	echo $this->Form->control('title');
	echo $this->Form->control('description');
	echo $this->Form->control('price');
	echo $this->Form->control('photos[]', ['type' => 'file', 'multiple' => true]);
	echo $this->Form->button('Save');
	echo $this->Form->end();