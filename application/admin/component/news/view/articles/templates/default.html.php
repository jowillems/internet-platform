<?
/**
 * Belgian Police Web Platform - News Component
 *
 * @copyright	Copyright (C) 2012 - 2013 Timble CVBA. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		https://github.com/belgianpolice/internet-platform
 */
?>

<!--
<script src="assets://js/koowa.js" />
<style src="assets://css/koowa.css" />
-->

<ktml:module position="actionbar">
    <ktml:toolbar type="actionbar">
</ktml:module>

<form action="" method="get" class="-koowa-grid">
	<?= import('default_scopebar.html'); ?>
	<table>
	<thead>
		<tr>
			<th width="10">
				<?= helper( 'grid.checkall'); ?>
			</th>
            <th width="1"></th>
			<th width="100%">
				<?= helper('grid.sort', array('column' => 'title')) ?>
			</th>
            <th>
                <?= helper('grid.sort', array('column' => 'ordering_date', 'title' => 'Created on')) ?>
            </th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="7">
				<?= helper('com:application.paginator.pagination', array('total' => $total)) ?>
			</td>
		</tr>
	</tfoot>
	<tbody>
		<? foreach ($articles as $article) : ?>
		<tr>
			<td align="center">
				<?= helper('grid.checkbox', array('row' => $article))?>
			</td>
            <td align="center">
                <?= helper('grid.enable', array('row' => $article, 'field' => 'published')) ?>
            </td>
            <td class="ellipsis">
                <? if($article->sticky) : ?>
                    <i class="icon-star"></i>
                <? endif ?>
                <a href="<?= route( 'view=article&task=edit&id='.$article->id ); ?>">
					<?= $article->title ?>
				</a>
			</td>
            <td>
                <?= helper('date.format', array('date'=> $article->ordering_date, 'format' => 'D d/m/Y - G:i')) ?>
            </td>
		</tr>
		<? endforeach; ?>
	</tbody>
	</table>
</form>