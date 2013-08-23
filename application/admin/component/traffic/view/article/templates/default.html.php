<?
/**
 * Belgian Police Web Platform - Traffic Component
 *
 * @copyright	Copyright (C) 2012 - 2013 Timble CVBA. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		http://www.police.be
 */
?>

<?= helper('behavior.validator'); ?>

<ktml:module position="actionbar">
    <ktml:toolbar type="actionbar">
</ktml:module>

<!--
<script src="media://js/koowa.js" />
-->

<form action="" method="post" class="-koowa-form">	
	<input type="hidden" name="published" value="0" />
	
	<div class="main">
        <div class="title">
            <input class="required" type="text" name="title" maxlength="255" value="<?= $article->title ?>" placeholder="<?= translate('Title') ?>" />
            <div class="slug">
                <span class="add-on">Slug</span>
                <input type="text" name="slug" maxlength="255" value="<?= $article->slug ?>" />
            </div>
        </div>
		
		<?= object('com:ckeditor.controller.editor')->render(array('name' => 'text', 'text' => $article->text)) ?>
	</div>
	<div class="sidebar">
        <fieldset>
            <legend><?= translate('Publish') ?></legend>
            <div>
                <label for="published"><?= translate('Published') ?></label>
                <div>
                    <input type="checkbox" name="published" value="1" <?= $article->published ? 'checked="checked"' : '' ?> />
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend><?= translate('Details') ?></legend>
            <div>
                <label for="date">
                    <?= translate('Start on') ?>
                </label>
                <div>
                    <?= helper('com:articles.date.datetime', array('row' => $article, 'name' => 'start_on', 'type' => 'date')) ?>
                </div>
            </div>
            <div>
                <label for="date">
                    <?= translate('End on') ?>
                </label>
                <div>
                    <?= helper('com:articles.date.datetime', array('row' => $article, 'name' => 'end_on', 'type' => 'date')) ?>
                </div>
            </div>
        </fieldset>
        <fieldset class="categories group">
            <legend><?= translate('Category') ?></legend>
            <div>
                <?= helper('listbox.radiolist', array(
                    'list'     => object('com:traffic.model.categories')->sort('title')->table('traffic')->getRowset(),
                    'selected' => $article->categories_category_id,
                    'name'     => 'categories_category_id',
                    'text'     => 'title',
                ));
                ?>
            </div>
        </fieldset>
        <? if($article->isStreetable()) : ?>
        <fieldset>
            <legend><?= translate('Streets') ?></legend>
                <?= helper('com:streets.listbox.streets', array('selected' => $article->getStreets()->streets_street_id, 'deselect' => false, 'attribs' => array('multiple' => 'multiple', 'class' => 'select-streets', 'style' => 'width:100%;'))); ?>
                <script data-inline> $jQuery(".select-streets").select2(); </script>
        </fieldset>
        <? endif ?>
    </div>
</form>