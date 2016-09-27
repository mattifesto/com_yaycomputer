<?php

final class YCFrontPageListView {

    /**
     * @return [stdClass]
     */
    public static function fetchPages() {
        $SQL = <<<EOT

            SELECT  `published`, `subtitleHTML`, `thumbnailURL`, `titleHTML`, `URI`
            FROM `ColbyPages`
            WHERE `classNameForKind` = 'YCBlogPostPageKind' AND `published` IS NOT NULL
            ORDER BY `published` DESC
            LIMIT 10

EOT;

        return CBDB::SQLToObjects($SQL);
    }

    /**
     * @param stdClass $model
     *
     * @return null
     */
    public static function renderModelAsHTML(stdClass $model) {
        CBHTMLOutput::requireClassName(__CLASS__);

        $pages = YCFrontPageListView::fetchPages();

        ?>

        <div class="YCFrontPageListView">
            <?php array_walk($pages, 'YCFrontPageListView::renderPagePanel') ?>
        </div>

        <?php
    }

    /**
     * @param stdClass $page
     *
     * @return null
     */
    public static function renderPagePanel(stdClass $page) {
        ?>

        <a href="<?= CBSiteURL . "/{$page->URI}/" ?>">
            <h2><?= $page->titleHTML ?></h2>
            <div class="description"><?= $page->subtitleHTML ?></div>
            <div><?= ColbyConvert::timestampToHTML($page->published) ?></div>
        </a>

        <?php
    }

    /**
     * @return [string]
     */
    public static function requiredCSSURLs() {
        return [Colby::flexnameForCSSForClass(CBSiteURL, __CLASS__)];
    }

    /**
     * @param stdClass $spec
     *
     * @return stdClass
     */
    public static function specToModel(stdClass $spec) {
        return (object)[
            'className' => __CLASS__,
        ];
    }
}
