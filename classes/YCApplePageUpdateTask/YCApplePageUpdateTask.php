<?php

final class YCApplePageUpdateTask {

    /**
     * @param hex160 $ID
     *
     * @return void
     */
    static function CBTasks2_run(string $ID): void {
        if ($ID !== YCApplePage::ID()) {
            throw new Exception("YCApplePageUpdateTask was run with an invalid ID: {$ID}");
        }

        $SQL = <<<EOT

            SELECT  LOWER(HEX(ID)) as ID
            FROM    CBModels
            WHERE   className = 'YCAppleProduct'

EOT;

        $IDs = CBDB::SQLToArray($SQL);
        $models = CBModels::fetchModelsByID($IDs);
        $originalPageSpec = CBModels::fetchSpecByID(YCApplePage::ID());

        if (empty($originalPageSpec)) {
            throw new Exception('The apple page does not exist.');
        } else {
            $pageSpec = CBModel::clone($originalPageSpec);
        }

        /* apple view */

        usort($models, function($modela, $modelb) {
            $sorta = CBModel::valueAsInt($modela, 'sort');
            $sortb = CBModel::valueAsInt($modelb, 'sort');

            if ($sorta < $sortb) {
                return -1;
            } else if ($sorta > $sortb) {
                return 1;
            } else {
                return 0;
            }
        });

        $viewSpec = CBView::findSubview($pageSpec, 'className', 'YCAppleProductsView');

        if (empty($viewSpec)) {
            $subviews = CBView::getSubviews($pageSpec);
            $viewSpec = (object)[
                'className' => 'YCAppleProductsView',
            ];

            array_push($subviews, $viewSpec);

            CBView::setSubviews($pageSpec, $subviews);
        }

        $viewSpec->productModels = $models;

        if ($pageSpec != $originalPageSpec) {
            CBDB::transaction(function () use ($pageSpec) {
                CBModels::save($pageSpec);
            });
        }
    }

    /**
     * @return void
     */
    static function restart(): void {
        CBTasks2::restart(__CLASS__, YCApplePage::ID(), /* priority */ 75);
    }
}
