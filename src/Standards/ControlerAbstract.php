<?php
namespace App\Standards;

use Smarty;

abstract class ControlerAbstract
{
    public function template(string $tpl): void
    {
        $smarty = new Smarty;
        //TO DO
        $smarty->setTemplateDir(APP_ROOT.'/templates/');
        $smarty->display($tpl);
    }
}