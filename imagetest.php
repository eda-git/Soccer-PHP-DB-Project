<html>
<head>
<script src="http://jariz.github.io/vibrant.js/dist/Vibrant.min.js"></script>
</head>
<body>
<script>
var img = document.createElement('img');
img.setAttribute('src', 'elfarolito.png')

img.addEventListener('load', function() {
    var vibrant = new Vibrant(img);
    var swatches = vibrant.swatches()
    for (var swatch in swatches)
        if (swatches.hasOwnProperty(swatch) && swatches[swatch])
            console.log(swatch, swatches[swatch].getHex())

    /*
     * Results into:
     * Vibrant #7a4426
     * Muted #7b9eae
     * DarkVibrant #348945
     * DarkMuted #141414
     * LightVibrant #f3ccb4
     */
});
</script>
</body>
