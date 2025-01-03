<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Solutions</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Boxicons CDN -->
    <link href="https://unpkg.com/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/css/custom.css'])
</head>
<body>
    @include('partials.sidebar')

    <div class="main-content">
        <div class="content-header flex-container">
            <div class="content">
                <div class="flex justify-end">
                    <a href="{{ route('admin.gallery') }}" class="add-button">
                        Back to Gallery
                    </a>
                </div>

                <section class="text-gray-600 body-font">
                    <div class="flex flex-col text-center w-full mb-20">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Add New Image</h1>
                        <div class="h-1 w-20 bg-yellow-500 rounded mx-auto"></div>
                    </div>

                    <div class="flex items-center justify-center">
                        <div class="container w-[500px] h-auto p-8">
                            <form action="{{ route('photo.upload') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
                                @csrf
                                <div class="mb-4">
                                    <label for="title" class="block text-gray-700 font-medium mb-2">Photo Title</label>
                                    <input 
                                        type="text" 
                                        name="title" 
                                        id="title" 
                                        placeholder="Enter photo title" 
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                                        required>
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="block text-gray-700 font-medium mb-2">Photo Description</label>
                                    <textarea 
                                        name="description" 
                                        id="description" 
                                        rows="4" 
                                        placeholder="Write a short description about the photo" 
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                                        required></textarea>
                                </div>

                                <div class="mb-4">
                                    <label for="photo" class="block text-gray-700 font-medium mb-2">Upload Photo</label>
                                    
                                    <div id="image-preview-container" class="hidden mb-2">
                                        <img id="image-preview" src="" alt="Image Preview" class="w-full h-auto rounded-lg">
                                    </div>

                                    <input 
                                        type="file" 
                                        name="photo" 
                                        id="photo" 
                                        accept="image/*" 
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                                        required>
                                </div>

                                <button 
                                    type="submit" 
                                    class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                    Upload
                                </button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>
        const photoInput = document.getElementById('photo');
        const imagePreviewContainer = document.getElementById('image-preview-container');
        const imagePreview = document.getElementById('image-preview');

        photoInput.addEventListener('change', function() {
            const file = photoInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreviewContainer.classList.remove('hidden'); 
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
