<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;

class HtmlEditor extends Field
{
    protected string $view = 'forms.components.html-editor'; 

    protected function setUp(): void
	{
		parent::setUp();
		$this->default('');
		$this->dehydrated(false);
		$this->disableLabel();
	}

}
