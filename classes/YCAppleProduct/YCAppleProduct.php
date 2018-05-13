<?php

final class YCAppleProduct {

    /**
     * @param model $spec
     *
     * @return ?model
     */
    static function CBModel_build(stdClass $spec): ?stdClass {
        return (object)[
            'amazonCode' => trim(CBModel::valueToString($spec, 'amazonCode')),
            'content' => CBModel::valueToString($spec, 'content'),
            'productURL' => trim(CBModel::valueToString($spec, 'productURL')),
            'sort' => CBModel::valueAsInt($spec, 'sort'),
        ];
    }

    /**
     * @param model $spec
     *
     * @return ?hex160
     */
    static function CBModel_toID(stdClass $spec): ?string {
        $moniker = trim(CBModel::valueToString($spec, 'moniker'));

        return sha1("YCAppleProduct {$moniker}");
    }

    /**
     * @param [model] $models
     *
     * @return void
     */
    static function CBModels_willSave(array $models): void {
        YCApplePageUpdateTask::restart();
    }
}
