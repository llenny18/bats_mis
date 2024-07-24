const imageUpload1 = document.getElementById('imageUpload1');
const imageUpload2 = document.getElementById('imageUpload2');
const resultDiv = document.getElementById('result');

Promise.all([
    faceapi.nets.ssdMobilenetv1.loadFromUri('/models'),
    faceapi.nets.faceLandmark68Net.loadFromUri('/models'),
    faceapi.nets.faceRecognitionNet.loadFromUri('/models')
]).then(start);

function start() {
    imageUpload1.addEventListener('change', async () => {
        const image1 = await faceapi.bufferToImage(imageUpload1.files[0]);
        const image2 = await faceapi.bufferToImage(imageUpload2.files[0]);
        
        const descriptor1 = await getFaceDescriptor(image1);
        const descriptor2 = await getFaceDescriptor(image2);
        
        const distance = faceapi.euclideanDistance(descriptor1, descriptor2);
        resultDiv.innerText = `Distance: ${distance}`;
    });

    imageUpload2.addEventListener('change', async () => {
        const image1 = await faceapi.bufferToImage(imageUpload1.files[0]);
        const image2 = await faceapi.bufferToImage(imageUpload2.files[0]);
        
        const descriptor1 = await getFaceDescriptor(image1);
        const descriptor2 = await getFaceDescriptor(image2);
        
        const distance = faceapi.euclideanDistance(descriptor1, descriptor2);
        resultDiv.innerText = `Distance: ${distance}`;
    });
}

async function getFaceDescriptor(image) {
    const detections = await faceapi.detectSingleFace(image).withFaceLandmarks().withFaceDescriptor();
    return detections.descriptor;
}
