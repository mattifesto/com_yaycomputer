<?php

final class YCPageFrame {

    /**
     * @return void
     */
    static function CBInstall_install(): void {
        CBPageFrames::installFrame(__CLASS__);
    }

    /**
     * @return [string]
     */
    static function CBInstall_requiredClassNames(): array {
        return ['CBPageFrames'];
    }

    /**
     * @param callable $renderContent
     *
     * @return void
     */
    static function CBPageFrame_render(callable $renderContent): void {
        CBView::render((object)[
            'className' => 'YCPageHeaderView',
        ]);

        $renderContent();

        CBView::render((object)[
            'className' => 'YCPageFooterView',
        ]);
    }
}
