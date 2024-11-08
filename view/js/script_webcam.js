document.addEventListener( 'DOMContentLoaded', () => {
    const videoElement = document.getElementById('inputVideo');
        
    // Asegurarse de que la función `onPlay` se llame cuando el video esté listo
    videoElement.addEventListener('loadedmetadata', () => onPlay(videoElement));
    Main();
} );




function Main(){
    const video = document.getElementById('inputVideo');
    const canvas = document.getElementById('overlay');

    (async () => {
        const stream = await navigator.mediaDevices.getUserMedia({ video: {} });
        video.srcObject = stream;
    })();

    setTimeout(() => onPlay(), 100);

    async function onPlay() {


    const MODEL_URL = 'js/models/';

    await faceapi.loadSsdMobilenetv1Model(MODEL_URL);
    await faceapi.loadFaceLandmarkModel(MODEL_URL);
    await faceapi.loadFaceRecognitionModel(MODEL_URL);
    await faceapi.loadFaceExpressionModel(MODEL_URL);

    let fullFaceDescriptions = await faceapi.detectAllFaces(video)
        .withFaceLandmarks()
        .withFaceDescriptors()
    .withFaceExpressions();

    const dims = faceapi.matchDimensions(canvas, video, true);
    const resizedResults = faceapi.resizeResults(fullFaceDescriptions, dims);

    faceapi.draw.drawDetections(canvas, resizedResults);
    faceapi.draw.drawFaceLandmarks(canvas, resizedResults);
    // faceapi.draw.drawFaceExpressions(canvas, resizedResults, 0.05);


    const faceMatcher = new faceapi.FaceMatcher(fullFaceDescriptions);
    //Lo comparamos con la siguiente img

    //El nombre de esta variable debería llegar en el post
    const img2 = await faceapi.fetchImage(`http://localhost/herbopedia/img/loginFace/jesusnew.png`);

    // console.log( img2 );     

    const singleResult = await faceapi
    .detectSingleFace( img2 )
    .withFaceLandmarks()
    .withFaceDescriptor()
    
    setTimeout(() => onPlay(), 100);



    if (singleResult) {
        const bestMatch = faceMatcher.findBestMatch(singleResult.descriptor)
        // console.log(bestMatch._distance)
        console.log(bestMatch._distance);
        

        if(bestMatch._distance < 0.4  ){
            setTimeout( ()=> {
                window.location.href = "http://localhost/herbopedia/view/admin.php";

            }, 6000 );
        }
        else{
            console.log( "No aprobado" );
        }
    }


}


}