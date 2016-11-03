<?php
class View {
    public function render($title,$content,$template,$data=null,$data2=null,$data3=null) {
        include 'app/views/'.$template;
    }
}