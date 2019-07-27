<?php

/**
 * @deprecated 2018_04_19
 *
 *      CBModel_upgrade() will convert specs for this view into CBArtworkView
 *      specs. This class can be deleted after this has run on all sites.
 */
final class YCArtworkView {

    /**
     * @return void
     */
    static function CBInstall_install(): void {
        CBViewCatalog::installView(
            __CLASS__,
            (object)[
                'isDeprecated' => true,
            ]
        );
    }


    /**
     * @return [string]
     */
    static function CBInstall_requiredClassNames(): array {
        return [
            'CBViewCatalog',
        ];
    }


    /**
     * @param model $spec
     *
     * @return model
     */
    static function CBModel_upgrade(stdClass $spec): stdClass {
        $specAsMarkup = CBMessageMarkup::stringToMarkup(
            CBConvert::valueToPrettyJSON($spec)
        );

        CBLog::log((object)[
            'className' => __CLASS__,
            'message' => <<<EOT

                A YCArtworkView was upgraded to a CBArtworkView

                --- pre\n{$specAsMarkup}
                ---

EOT
        ]);

        CBModel::merge($spec, (object)[
            'className' => 'CBArtworkView',
            'size' => 'rw1280',
        ]);

        return $spec;
    }


    /**
     * @return null
     */
    static function CBView_render(stdClass $model) {
        if (empty($model->image)) {
            echo '<!-- YCArtworkView without an image. -->';
            return;
        }

        echo '<figure class="YCArtworkView">';

        $image = $model->image;
        $basename = "{$image->filename}.{$image->extension}";

        CBArtworkElement::render(
            [
                'height' => $image->height,
                'maxWidth' => (
                    empty($model->maxWidth) ?
                    $image->width / 2 :
                    $image->maxWidth
                ),
                'width' => $image->width,
                'URL' => CBDataStore::flexpath(
                    $image->ID,
                    $basename,
                    cbsiteurl()
                 ),
            ]
        );

        echo '</figure>';
    }


    /**
     * @return [string]
     */
    static function CBHTMLOutput_CSSURLs() {
        return [Colby::flexpath(__CLASS__, 'css', cbsiteurl())];
    }


    /**
     * @param model $spec
     *
     * @return ?model
     */
    static function CBModel_build(stdClass $spec): ?stdClass {
        $model = (object)[];

        /* image */

        if ($imageSpec = CBModel::valueAsModel($spec, 'image', ['CBImage'])) {
            $model->image = CBModel::build($imageSpec);
        }

        return $model;
    }
}
