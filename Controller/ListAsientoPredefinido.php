<?php
namespace FacturaScripts\Plugins\AsientosPredefinidos\Controller;

use FacturaScripts\Core\Lib\ExtendedController\ListController;
use FacturaScripts\Core\Base\DataBase\DataBaseWhere;

class ListAsientoPredefinido extends ListController
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
        
        $this->addOrderBy($viewName, ["idasientopredefinido"], "code");
        $this->addOrderBy($viewName, ["descripcion"], "description", 1);
        
        $this->addSearchFields($viewName, ["idasientopredefinido", "descripcion"]);

        /// Filters
        $this->addFilterSelectWhere($viewName, 'status', [
            ['label' => $this->toolBox()->i18n()->trans('only-active'), 'where' => [new DataBaseWhere('debaja', false)]],
            ['label' => $this->toolBox()->i18n()->trans('only-suspended'), 'where' => [new DataBaseWhere('debaja', true)]],
            ['label' => $this->toolBox()->i18n()->trans('all'), 'where' => []]
        ]);

    }
}
