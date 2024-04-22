$(() => {
    $(function() {
        $('.am-container').montage({
            liquid: true,
            fillLastRow: true,
            margin: 5,
            fixedHeight: 160,
        });
    });

    Fancybox.bind('[data-fancybox]', {
        groupAll: true,
    });

    let $fileInput = $(document).find('[data-component="fileinput"]');

    $fileInput.fileinput({
        showUpload: false,
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        maxFileCount: 5,
        inputGroupClass: "input-group",
        allowedFileExtensions: ['png','jpg','jpeg','bmp','svg','webp'],
        overwriteInitial: false,
        fileActionSettings: {
            showZoom: false
        },
        language: "ru"
    });
});
