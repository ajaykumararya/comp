jQuery("document").ready(function($) {

    //key value 
    $('.wdt-igenerator-txt a').click(function() {
        imggenerator = $(this).attr('data-igenerator');
        $("#imagekeyname").val(imggenerator);
    });


    $('body').on('click', '.imagegeneratebtn', function(e) {
        const aiImageForm = document.querySelector(".wdt-sc-image-generate-form");
        const imagegenerateBtn = aiImageForm.querySelector(".imagegeneratebtn");
        const aiimageGallery = document.querySelector(".wdt-sc-image-generate-notify");

        const IMAGE_API_KEY = document.forms["imagegenerate"]["wdt_image_api_key"].value; // OpenAI API key here

        let isImageGenerating = false;

        const updateAiImageCard = (aiimgDataArray) => {
            aiimgDataArray.forEach((imgObject, index) => {
                const aiimgContainer = aiimageGallery.querySelectorAll(".ai-image-card")[index];
                const aiimgElement = aiimgContainer.querySelector("img");
                const imgdownloadBtn = aiimgContainer.querySelector(".wdt-download-btn");

                // Set the image source to the AI-generated image data
                const aiGeneratedImage = `data:image/jpeg;base64,${imgObject.b64_json}`;
                aiimgElement.src = aiGeneratedImage;

                aiimgElement.onload = () => {
                    aiimgContainer.classList.remove("loading");
                    imgdownloadBtn.setAttribute("href", aiGeneratedImage);
                    imgdownloadBtn.setAttribute("download", `${new Date().getTime()}.jpg`);
                }
            });
        }

        const AiImagegenerate = async (userPrompt, userImgQuantity) => {
            try {
                // Send a request to generate images based on user inputs
                const responseData = await fetch("https://api.openai.com/v1/images/generations", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Authorization": `Bearer ${IMAGE_API_KEY}`,
                    },
                    body: JSON.stringify({
                        model: "dall-e-3",
                        prompt: userPrompt,
                        n: userImgQuantity,
                        size: "512x512",
                        response_format: "b64_json"
                    }),
                });

                //  the API error response 
                // if(!responseData.ok) throw new Error("Failed to generate AI images. Make sure your API key is valid.");

                const {
                    data
                } = await responseData.json();

                updateAiImageCard([...data]);
            } catch (error) {
                alert(error.message);
            } finally {
                imagegenerateBtn.removeAttribute("disabled");
                imagegenerateBtn.innerText = "Generate";
                isImageGenerating = false;
            }
        }

        const handleImageGeneration = (e) => {
            e.preventDefault();
            if (isImageGenerating) return;

            const userPrompt = e.srcElement[0].value;
            const userImgQuantity = parseInt(e.srcElement[2].value);

            imagegenerateBtn.setAttribute("disabled", true);
            imagegenerateBtn.innerText = "Generating";
            isImageGenerating = true;

            var imageaiurl = aiimagepath.aiimageurl;

            const imgCardMarkup = Array.from({
                    length: userImgQuantity
                }, () =>
                '<div class="ai-image-card loading">' +
                '<img src="' + imageaiurl + '/loader.svg" alt="AI generated image">' +
                '<a class="wdt-download-btn" href="#">' +
                '<i class="fa fa-download" aria-hidden="true"></i>' +
                '</a>' +
                '</div>'
            ).join("");

            aiimageGallery.innerHTML = imgCardMarkup;
            AiImagegenerate(userPrompt, userImgQuantity);
        }

        aiImageForm.addEventListener("submit", handleImageGeneration);

    });
});