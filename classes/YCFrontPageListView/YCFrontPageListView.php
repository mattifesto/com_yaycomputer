<?php

final class YCFrontPageListView {

    /**
     * @return [stdClass]
     */
    static function fetchPages() {
        $SQL = <<<EOT

            SELECT      `keyValueData`
            FROM        `ColbyPages`
            WHERE       `classNameForKind` = 'YCBlogPostPageKind' AND
                        `published` IS NOT NULL
            ORDER BY    `published` DESC
            LIMIT       10

EOT;

        return CBDB::SQLToArray($SQL, ['valueIsJSON' => true]);
    }

    /**
     * @param stdClass $model
     *
     * @return null
     */
    static function renderModelAsHTML(stdClass $model) {
        CBHTMLOutput::requireClassName(__CLASS__);

        $pages = YCFrontPageListView::fetchPages();
        $firstPage = array_shift($pages)

        ?>

        <div class="YCFrontPageListView">
            <div class="first">
                <?php YCFrontPageListView::renderPagePanel($firstPage, "rw1280"); ?>
            </div>
            <div class="container">
                <?php array_walk($pages, function ($page) { YCFrontPageListView::renderPagePanel($page); }); ?>
            </div>
        </div>

        <?php
    }

    /**
     * @param object (CBPageSummaryView) $model
     *
     *      The CBPageSummaryView model for the page.
     *
     * @return null
     */
    static function renderPagePanel(stdClass $model, $imageSize = "rw640") {
        if (empty($model->image)) {
            $URL = CBModel::value($model, 'thumbnailURL');
        } else {
            $filename = "{$imageSize}.{$model->image->extension}";
            $URL = CBDataStore::flexpath($model->image->ID, $filename, CBSitePreferences::siteURL());
        }

        ?>

        <a class="page" href="<?= CBSitePreferences::siteURL() . "/{$model->URI}/" ?>">
            <figure class="image">
                <div>
                    <div>
                        <?php if (!empty($URL)) { ?>

                        <img src="<?= $URL ?>" alt="<?= $model->titleHTML ?>">

                        <?php } ?>
                    </div>
                </div>
            </figure>
            <h2 class="title"><?= $model->titleHTML ?></h2>
            <div class="description"><?= $model->descriptionHTML ?></div>
            <div><?= ColbyConvert::timestampToHTML($model->publicationTimeStamp) ?></div>
        </a>

        <?php
    }

    /**
     * @return [string]
     */
    static function requiredCSSURLs() {
        return [Colby::flexnameForCSSForClass(CBSitePreferences::siteURL(), __CLASS__)];
    }

    /**
     * @param stdClass $spec
     *
     * @return stdClass
     */
    static function specToModel(stdClass $spec) {
        return (object)[
            'className' => __CLASS__,
        ];
    }
}
