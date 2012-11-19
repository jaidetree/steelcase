<?php 
class PagesObserver 
{
}
APP::modules()->observer->attach(new PagesObserver(), 'PagesController');
?>