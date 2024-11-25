document.addEventListener('DOMContentLoaded', () => {
    const videoElement = document.getElementById('inputVideo');

    // Asegurarse de que la función `onPlay` se llame cuando el video esté listo
    videoElement.addEventListener('loadedmetadata', () => onPlay(videoElement));

    Main();
});

async function onPlay(video) {
    const canvas = document.getElementById('overlay');
    const MODEL_URL = 'js/models/';

    // Cargar modelos de face-api.js
    await faceapi.loadSsdMobilenetv1Model(MODEL_URL);
    await faceapi.loadFaceLandmarkModel(MODEL_URL);
    await faceapi.loadFaceRecognitionModel(MODEL_URL);
    await faceapi.loadFaceExpressionModel(MODEL_URL);

    let fullFaceDescriptions = await faceapi
        .detectAllFaces(video)
        .withFaceLandmarks()
        .withFaceDescriptors()
        .withFaceExpressions();

    const dims = faceapi.matchDimensions(canvas, video, true);
    const resizedResults = faceapi.resizeResults(fullFaceDescriptions, dims);

    faceapi.draw.drawDetections(canvas, resizedResults);
    faceapi.draw.drawFaceLandmarks(canvas, resizedResults);

    if (fullFaceDescriptions.length > 0) {
        const faceMatcher = new faceapi.FaceMatcher(fullFaceDescriptions);

        // Cargar y comparar con la imagen de referencia
        const img2 = await faceapi.fetchImage(`http://localhost/herbopedia/img/loginFace/jesusnew.png`);
        const singleResult = await faceapi
            .detectSingleFace(img2)
            .withFaceLandmarks()
            .withFaceDescriptor();

        if (singleResult) {
            const bestMatch = faceMatcher.findBestMatch(singleResult.descriptor);
            console.log(bestMatch._distance);

            if (bestMatch._distance < 0.4) {
                setTimeout(() => {
                    window.location.href = "http://localhost/herbopedia/view/admin.php";
                }, 6000);
            } else {
                console.log("No aprobado");
            }
        } else {
            console.warn("No se detectó ningún rostro en la imagen de referencia.");
        }
    } else {
        console.warn("No se detectó ningún rostro en el video. Intentando nuevamente...");
    }

    // Llama a `onPlay` de nuevo para seguir intentando detectar rostros
    setTimeout(() => onPlay(video), 100);
}

function Main() {
    const video = document.getElementById('inputVideo');

    (async () => {
        const stream = await navigator.mediaDevices.getUserMedia({ video: {} });
        video.srcObject = stream;
    })();
}
