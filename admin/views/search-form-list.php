<?php 
$html_table_head='';
$html_table_body='';
?>
<div class="jc-wp-ajax-form-create">
	<h1><?php echo __('Searchs Forms','jc-ajax-search-for-woocommerce'); ?></h1>
	<a class="btn-create button button-primary button-large" href="<?php echo admin_url( 'admin.php' );?>?page=create-search-form"><?php echo __('Create','jc-ajax-search-for-woocommerce'); ?></a>
	<table class="wp-list-table widefat fixed striped table-view-list jcwp-search-form">
		<thead>
			<tr>
				<th><?php echo __('ID','jc-ajax-search-for-woocommerce'); ?></th>
				<th><?php echo __('Name','jc-ajax-search-for-woocommerce'); ?></th>
				<th><?php echo __('Shorcode','jc-ajax-search-for-woocommerce'); ?></th>
				<th><?php echo __('Actions','jc-ajax-search-for-woocommerce'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if (isset($search_forms)) {
				foreach ($search_forms as $key => $value) {
					?>
					<tr>
						<td><?php echo intval($value->id); ?></td>
						<td><?php echo esc_attr( $value->wcjc_title ) ?></td>
						<td>[jcwpsearchform id="<?php echo intval($value->id); ?>"]</td>
						<td class="actions">
							<a class="button button-primary button-large" href="<?php echo admin_url( 'admin.php' );?>?page=create-search-form&id=<?php echo intval($value->id); ?>"><?php echo __('Edit','jc-ajax-search-for-woocommerce'); ?></a>
							<span class="btn-delete button button-primary button-large" data-formid="<?php echo intval($value->id); ?>" href=""><?php echo __('Remove','jc-ajax-search-for-woocommerce'); ?></span>
						</td>
					</tr>
					<?php
				}
			}
			?>
		</tbody>	
	</table>
</div>