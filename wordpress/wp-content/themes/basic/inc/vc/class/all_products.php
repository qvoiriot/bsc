<?php  
// require_once vc_path_dir('SHORTCODES_DIR', 'vc-posts-grid.php');
class WPBakeryShortCode_Wpo_All_Products extends WPBakeryShortCode {

	public function getListQuery( $show_tab ){
		$list_query = array();
		$types = explode(',', $this->atts['show_tab']);
		foreach ($types as $type) {
			$list_query[$type] = $this->getTabTitle($type);
		}
		return $list_query;
	}

	public function getTabTitle($type){
		switch ($type) {
			case 'recent':
				return array('title'=>__('Latest Products','basic'),'title_tab'=>__('Latest','basic'));
			case 'featured_product':
				return array('title'=>__('Featured Products','basic'),'title_tab'=>__('Featured','basic'));
			case 'top_rate':
				return array('title'=> __('Top Rated Products','basic'),'title_tab'=>__('Top Rated', 'basic'));
			case 'best_selling':
				return array('title'=>__('BestSeller Products','basic'),'title_tab'=>__('BestSeller','basic'));
			case 'on_sale':
				return array('title'=>__('Special Products','basic'),'title_tab'=>__('Special','basic'));
		}
	}
}