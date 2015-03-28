<?php

//<div class="pagination">
//        <a href="#" class="prev page-numbers"><span class="icon-text left">&#9666;</span>Previous Page</a>
//        <a href="#" class="page-numbers">1</a>
//        <a href="#" class="page-numbers current">2</a>
//        <a href="#" class="page-numbers">3</a>
//        <a href="#" class="page-numbers">4</a>
//        <a href="#" class="page-numbers">6</a>
//        <a href="#" class="next page-numbers">Next Page<span class="icon-text right">&#9656;</span></a>
//</div>

        function paginate ($base_url, $total_rows, $per_page, $uri_segment)
        {
                $config = array('base_url' => $base_url, 
                                'total_rows' => $total_rows, 
                                'per_page' => $per_page, 
                                'uri_segment' => $uri_segment);
                
                
                $config['anchor_class'] = 'class="page-numbers" ';
                 
                $config['first_link'] = 'First';
                $config['first_tag_open'] = '';
                $config['first_tag_close'] = ''.PHP_EOL;
                
                $config['last_link'] = 'Last';
                $config['last_tag_open'] = '';
                $config['last_tag_close'] = ''.PHP_EOL;
                
                $config['next_link'] = 'Next Page<span class="icon-text right">&#9656;</span>';
                $config['next_tag_open'] = '';
                $config['next_tag_close'] = ''.PHP_EOL;
                
                $config['prev_link'] = '<span class="icon-text left">&#9666;</span> Previous Page';
                $config['prev_tag_open'] = '';
                $config['prev_tag_close'] = ''.PHP_EOL;
                
                $config['cur_tag_open'] = '<a href="#" class="page-numbers current">';
                $config['cur_tag_close'] = '</a>'.PHP_EOL;
                
                $config['num_tag_open'] = '';
                $config['num_tag_close'] = ''.PHP_EOL;
                
                return $config;
        }
        
        function admin_paginate ($base_url, $total_rows, $per_page, $uri_segment)
        {
                $config = array('base_url' => $base_url, 
                                'total_rows' => $total_rows, 
                                'per_page' => $per_page, 
                                'uri_segment' => $uri_segment);
                
                
                $config['first_link'] = 'First';
                $config['first_tag_open'] = '<li>';
                $config['first_tag_close'] = '</li>';
                
                $config['last_link'] = 'Last';
                $config['last_tag_open'] = '<li>';
                $config['last_tag_close'] = '</li>';
                
                $config['next_link'] = 'Next';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                
                $config['prev_link'] = 'Previous';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                
                $config['cur_tag_open'] = '<li><span class="active">';
                $config['cur_tag_close'] = '</span></li>';
                
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                
                return $config;
        }