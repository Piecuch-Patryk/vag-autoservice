import Glide from '@glidejs/glide'

new Glide('.glide', {
  type: 'carousel',
  startAt: 0,
  perView: 4,
  autoplay: 3000,
  breakpoints: {
      576: {
          perView: 1,
      },
      768: {
          perView: 2,
      },
      1300: {
        perView: 3,
      }
  }
}).mount()