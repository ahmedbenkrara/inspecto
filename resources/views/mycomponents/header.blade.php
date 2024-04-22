<div class="relative sm:w-[95%] lg:w-[90%] rounded-md overflow-hidden mx-auto">
    <div class="slider">
      <div class="slider-container">
        <div class="slider-slide relative">
            <img id="containerSlide" class="w-full sm:h-[400px] md:h-[600px] object-cover rounded-md" src="https://images.unsplash.com/photo-1526726538690-5cbf956ae2fd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="">
            <div class="absolute top-0 left-0 w-full h-full bg-[#00000033] rounded-md">
                
            </div>
        </div>
        <div class="slider-slide relative">
            <img id="containerSlide" class="w-full sm:h-[400px] md:h-[600px] object-cover rounded-md" src="https://images.unsplash.com/photo-1591278169757-deac26e49555?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1469&q=80" alt="">
            <div class="absolute top-0 left-0 w-full h-full bg-[#00000033] rounded-md">
                
            </div>
        </div>
      </div>
    </div>
    <div class="prvnxt flex justify-between px-4">
        <button class="slider-button slider-prev-button block bg-[#ffffffa8] text-black rounded-full text-[12px] w-[40px] h-[40px]"><i class="fa-solid fa-chevron-left"></i></button>
        <button class="slider-button slider-next-button block bg-[#ffffffa8] text-black rounded-full text-[12px] w-[40px] h-[40px]"><i class="fa-solid fa-chevron-right"></i></button>
    </div>
  </div>

  <style>
    .slider {
      position: relative;
      overflow: hidden;
    }
  
    .slider-container {
      display: flex;
      width: 100%;
      transition: transform 0.5s;
    }
  
    .slider-slide {
      flex: 0 0 100%;
      width: 100%;
    }
  
    .prvnxt{
        position: absolute;
        inset: 0;
        margin: auto;
        width: 100%;
        height: fit-content;
        
    }

  </style>
  
  
<script>
    const sliderContainer = document.querySelector('.slider-container');
    const prevButton = document.querySelector('.slider-prev-button');
    const nextButton = document.querySelector('.slider-next-button');
    let slideIndex = 0;
  
    function showSlide(index) {
      if (index < 0) {
        slideIndex = sliderContainer.children.length - 1;
      } else if (index >= sliderContainer.children.length) {
        slideIndex = 0;
      }
      const offset = -slideIndex * 100;
      sliderContainer.style.transform = `translateX(${offset}%)`;
    }
  
    prevButton.addEventListener('click', () => {
      slideIndex--;
      showSlide(slideIndex);
    });
  
    nextButton.addEventListener('click', () => {
      slideIndex++;
      showSlide(slideIndex);
    });
  </script>
    