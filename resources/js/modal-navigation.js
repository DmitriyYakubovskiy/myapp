import $ from 'jquery';
window.$ = window.jQuery = $;

class ModalNavigation {
  constructor() {
    this.currentIndex = 0;
    this.dinosaurs = [];
    if (this.dinosaurs.length === 0) {
      this.collectDinosaurData();
    }
    this.setupKeyboardNavigation();
    this.setupModalEvents();
  }

  init() {
    this.collectDinosaurData();
    this.setupKeyboardNavigation();
    this.setupModalEvents();
  }

  collectDinosaurData() {
    $('.dino-card').each((index, element) => {
      const $card = $(element);
      this.dinosaurs.push({
        title: $card.data('title'),
        type: $card.data('type'),
        image: $card.data('image'),
        description: $card.data('description'),
        details: $card.data('details')
      });
    });
  }

  setupKeyboardNavigation() {
    $(document).on('keydown', (e) => {
      const $modal = $('#dinoModal');
      if ($modal.hasClass('show')) {
        switch(e.key) {
          case 'ArrowLeft':
            e.preventDefault();
            this.navigate(-1);
            break;
          case 'ArrowRight':
            e.preventDefault();
            this.navigate(1);
            break;
        }
      }
    });
  }

  setupModalEvents() {
    const self = this;
    
    $('#dinoModal').on('show.bs.modal', function (e) {
      const $button = $(e.relatedTarget);
      self.currentIndex = $button.data('index') || 0;
      self.updateModalContent();
    });

    $('#prevDino').on('click', function() {
      self.navigate(-1);
    });

    $('#nextDino').on('click', function() {
      self.navigate(1);
    });
  }

  navigate(direction) {
    this.currentIndex += direction;
    
    if (this.currentIndex < 0) {
      this.currentIndex = this.dinosaurs.length - 1;
    } else if (this.currentIndex >= this.dinosaurs.length) {
      this.currentIndex = 0;
    }
    
    this.updateModalContent();
  }

  updateModalContent() {
    if (this.dinosaurs.length === 0) {
      console.error('No dinosaur data available!');
      return;
    }
    
    const dino = this.dinosaurs[this.currentIndex];
    
    $('#modalDinoTitle').text(dino.title);
    $('#modalDinoImage').attr('src', dino.image).attr('alt', dino.title);
    $('#modalDinoDescription').text(dino.description);
    $('#modalDinoDetails').text(dino.details);
    $('#modalDinoType').text(dino.type === 'predator' ? 'Плотоядный' : 'Травоядный');

    const popoverElement = document.getElementById('dinoFactPopover');
    if (popoverElement) {
      const existingPopover = bootstrap.Popover.getInstance(popoverElement);
      if (existingPopover) {
        existingPopover.dispose();
      }
      
      const newContent = dino.type === 'predator' 
        ? 'Этот динозавр был хищником и охотился на других животных' 
        : 'Этот динозавр питался растениями и был мирным обитателем';
      
      new bootstrap.Popover(popoverElement, {
        content: newContent,
        placement: 'top'
      });
    }
  }
}

export default ModalNavigation;