<?php

final class YCArtworkView {

    /**
     * @param model $spec
     *
     * @return void
     */
    static function CBModel_upgrade(stdClass $spec): void {
        if ($imageSpec = CBModel::valueAsObject($spec, 'image')) {
            $spec->image = CBImage::fixAndUpgrade($imageSpec);
        }
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

        CBArtworkElement::render([
            'height' => $image->height,
            'maxWidth' => empty($model->maxWidth) ? $image->width / 2 : $image->maxWidth,
            'width' => $image->width,
            'URL' => CBDataStore::flexpath($image->ID, $basename, CBSitePreferences::siteURL()),
        ]);

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
