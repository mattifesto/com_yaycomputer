"use strict"; /* jshint strict: global */

var YCFrontPageListView = {

    animateThumbnails : function () {
        var thumbnail;
        var degrees = 0;
        var thumbnails = document.getElementsByClassName("YCFrontPageListViewThumbnail");

        for (var i = 0; i < thumbnails.length; i++) {
            thumbnail = thumbnails[i];
            degrees = Math.random() * 20 - 10;
            thumbnail.style.transform = "rotate(" + degrees + "deg)";
        }
    },
};

document.addEventListener("DOMContentLoaded", YCFrontPageListView.animateThumbnails);
