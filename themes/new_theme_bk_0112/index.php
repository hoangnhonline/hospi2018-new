<?php  
if( $appModule=='invoice'){
	echo $this->content();
}else{
	if ($appModule != 'blog') {
	    include('header.php');
	} else {
	    include('header_blog.php');
	}
	echo $this->content();
	include('footer.php');
}