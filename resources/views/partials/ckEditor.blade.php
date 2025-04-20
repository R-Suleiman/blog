<script>
    const {
        ClassicEditor,
        Essentials,
        Paragraph,
        Bold,
        Italic,
        Font,
        List,
        Alignment,
        Link,
        Indent
    } = window.CKEDITOR;

    document.querySelectorAll('.editor').forEach((element) => {
        ClassicEditor
            .create(element, {
                licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3Njg2OTQzOTksImp0aSI6IjdmOGY5NGJhLTI4YzktNDdmYi04NWFiLTUwYjMyMzcxMmRjZCIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiXSwiZmVhdHVyZXMiOlsiRFJVUCJdLCJ2YyI6IjkwOGRkNGU4In0.kIGTTTuSnXjV2j7DIKf1XdnwUrsTTk4qPPsXq-fJ9Cr5_fLP9cpUMtsBK5pb0P9NPCRtEWFJZ18PfTtiSyHOdA',
                plugins: [
                    Essentials, Paragraph, Bold, Italic, Font, List, Alignment, Link, Indent
                ],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontFamily', 'alignment:left', 'alignment:center', 'alignment:right', 'alignment:justify', '|',
                    'bulletedList', 'numberedList', '|', 'link', '|',
                    'outdent', 'indent'
                ]
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>

