<?php
require_once '../vendor/autoload.php';

if (isset($_POST['html'])) {
    $htmlToRtfConverter = new ChrisWillerton\HtmlToRtf\HtmlToRtf($_POST['html']);
    $htmlToRtfConverter->getRTFFile();
}
?>
<!DOCTYPE html>
<html>

<head>
    <!-- CDN hosted by Cachefly -->
    <script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            menubar: false,
            height: 300,
            toolbar: 'undo redo | bold underline italic strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent | code',
            plugins: ['code'],
        });
    </script>
</head>

<body>

    <form method="post">
        <textarea name='html'>

        <h1>Heading 1</h1>
        <h2>Heading 2</h2>
        <h3>Heading 3</h3>
        <h4>Heading 4</h4>
        <h5>Heading 5</h5>
        <h6>Heading 6</h6>

        <p>Welcome to the HTML-to-RTF-converter demo!</p>
        <p>If you have questions or need help, feel free to visit our <a
                href="https://github.com/MarijnMensinga/basic-HTML-to-RTF-converter">github page</a>!
        <p>If you think you have found a bug, you can use the <a
                href="https://github.com/MarijnMensinga/basic-HTML-to-RTF-converter/issues">Bug Tracker</a> to report bugs to the developers.</p>
        <p><span style="text-decoration: line-through;"><span style="text-decoration: underline;">And here is a simple table for you to play with.</span></span></p>
        <ul>
            <li><em>Test item 1</em></li>
            <ul>
                <li><em>Test item 2</em></li>
            </ul>
        </ul>
        <ol>
            <li>Test item 3</li>
            <li>Test item 4</li>
        </ol>
        <p style="text-align: center;"><strong>Enjoy our software and create great content!</strong></p>
        <p>Oh, and by the way, don't forget to check out <a href="http://www.tinymce.com"
                                                            target="_blank">TinyMCE</a>!</p>
        <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam consectetur nec elit eu sodales. Aenean ut aliquet lorem. Maecenas pellentesque nisi ligula, nec dignissim dui tincidunt et. Nam eget vulputate leo. Sed elit nibh, finibus vitae velit vitae, finibus tristique diam. Sed fermentum eget orci sed tristique. Nam sed purus quis sem suscipit venenatis vitae eget diam. Nunc vel convallis ligula. Aliquam vel vehicula ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam consectetur nec elit eu sodales. Aenean ut aliquet lorem. Maecenas pellentesque nisi ligula, nec dignissim dui tincidunt et. Nam eget vulputate leo. Sed elit nibh, finibus vitae velit vitae, finibus tristique diam. Sed fermentum eget orci sed tristique. Nam sed purus quis sem suscipit venenatis vitae eget diam. Nunc vel convallis ligula. Aliquam vel vehicula ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam consectetur nec elit eu sodales. Aenean ut aliquet lorem. Maecenas pellentesque nisi ligula, nec dignissim dui tincidunt et. Nam eget vulputate leo. Sed elit nibh, finibus vitae velit vitae, finibus tristique diam. Sed fermentum eget orci sed tristique. Nam sed purus quis sem suscipit venenatis vitae eget diam. Nunc vel convallis ligula. Aliquam vel vehicula ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam consectetur nec elit eu sodales. Aenean ut aliquet lorem. Maecenas pellentesque nisi ligula, nec dignissim dui tincidunt et. Nam eget vulputate leo. Sed elit nibh, finibus vitae velit vitae, finibus tristique diam. Sed fermentum eget orci sed tristique. Nam sed purus quis sem suscipit venenatis vitae eget diam. Nunc vel convallis ligula. Aliquam vel vehicula ante.</p>

        <table>
            <thead>
            <tr>
                <th>Header 1</th>
                <th>Header 2</th>
                <th>Header 3</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Some content 1</td>
                <td>Some content 2</td>
                <td>Some content 3</td>
            </tr>
            </tbody>
        </table>

    </textarea>
        <input type="submit" value="Download as RTF">
    </form>


</body>

</html>
