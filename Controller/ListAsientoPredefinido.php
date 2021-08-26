<?php
namespace FacturaScripts\Plugins\AsientosPredefinidos\Controller;

class ListAsientoPredefinido extends \FacturaScripts\Core\Lib\ExtendedController\ListController
{
    public function getPageData() {
        $pageData = parent::getPageData();
        $pageData["title"] = "Asientos Predefinidos";
        $pageData["menu"] = "accounting";
        $pageData["icon"] = "fas fa-cogs";
        return $pageData;
    }

    protected function createViews() {
        $this->createViewsAsientoPredefinido();
    }

    protected function createViewsAsientoPredefinido(string $viewName = "ListAsientoPredefinido") {
        $this->addView($viewName, "AsientoPredefinido", "T tulo asiento predefinido");
        
        // Esto es un ejemplo ... debe de cambiarlo según los nombres de campos del modelo
        $this->addOrderBy($viewName, ["idasientopredefinido"], "code");
        $this->addOrderBy($viewName, ["descripcion"], "description", 1);
        
        // Esto es un ejemplo ... debe de cambiarlo según los nombres de campos del modelo
        $this->addSearchFields($viewName, ["idasientopredefinido", "descripcion"]);
    }
}
