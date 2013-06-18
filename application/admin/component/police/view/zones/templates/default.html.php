<?
/**
 * Belgian Police Web Platform - Police Component
 *
 * @copyright	Copyright (C) 2012 - 2013 Timble CVBA. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		http://www.police.be
 */
?>

<!--
<script src="media://js/koowa.js" />
<style src="media://css/koowa.css" />
-->

<ktml:module position="toolbar">
    <?= @helper('toolbar.render', array('toolbar' => $toolbar))?>
</ktml:module>

<form action="" method="get" class="-koowa-grid">
	<?= @template('default_scopebar.html'); ?>
	<table>
	<thead>
		<tr>
			<th width="10">
				<?= @helper( 'grid.checkall'); ?>
			</th>
			<th>
				<?= @helper('grid.sort', array('column' => 'title')) ?>
			</th>
			<th>
				<?= @helper('grid.sort', array('column' => 'zones_zone_id', 'title' => 'Zone ID')) ?>
			</th>
			<th>
				<?= @helper('grid.sort', array('column' => 'language')) ?>
			</th>
            <th>
				<?= @helper('grid.sort', array('column' => 'chief_name', 'title' => 'Chief name')) ?>
			</th>
                        <th>
				<?= @helper('grid.sort', array('column' => 'chief_email', 'title' => 'Chief email')) ?>
			</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="6">
				<?= @helper('com:application.paginator.pagination', array('total' => $total)) ?>
			</td>
		</tr>
	</tfoot>
	<tbody>
		<? foreach ($zones as $zone) : ?>
		<tr>
			<td align="center">
				<?= @helper('grid.checkbox', array('row' => $zone))?>
			</td>
			<td>
				<a href="<?= @route( 'view=zone&task=edit&id='. $zone->id ); ?>"><?= @escape($zone->title); ?></a>
			</td>
			<td>
				<?= $zone->id ?>
			</td>
			<td>
				<?= @helper('com:police.grid.language', array('language' => $zone->language)) ?>
			</td>
            <td>
				<?= $zone->chief_name ?>
			</td>
            <td>
				<?= $zone->chief_email ?>
			</td>
		</tr>
		<? endforeach; ?>
	</tbody>
	</table>
</form>