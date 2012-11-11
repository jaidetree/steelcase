<?php 
class PagesObserver 
{
    function home()
    {
    }
}
APP::do('observer')->attach('PagesController', new PagesObserver());
?>