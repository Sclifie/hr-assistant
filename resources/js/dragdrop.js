const dragAndDrop = (componentId = 'drag-and-drop') => {
	return {

		progress : 20,
		upload : false,

		dragIn(){
			console.log('in');
		},

		dragOver(){
			console.log('over');
		},

		drop(e){
			if(e.dataTransfer.files.length > 0){
				const files = e.dataTransfer.files;

				if(this.validate(files)){
					this.uploadImage(files[0]);
				} else {
					alert('support only jpg files on current moment')
				}
			}
		},

		validate(files){
			return files[0].type === 'image/jpeg';
		},

		info(event) {

		},

		redrawCircle() {
			let progresCircle = document.getElementById('upload-progress-circle');
			// progresCircle.children[1].remove()
			progresCircle.children[1].outerHTML = `<circle r="40" cx="50" cy="50" 
			fill="transparent" 
			stroke="#22c55e" 
			stroke-width="12px" 
			stroke-dasharray="251.2px" 
			stroke-dashoffset="${this.calculateProgress(40)}px"></circle>`;
		},

		calculateProgress(radius =  40){
				let circumference = 2 * Math.PI * radius
				return circumference * ((100 - this.progress) / 100)
		},


		uploadImage(file){
			let component = Livewire.find(componentId)

			component.upload('image', file, () => {
				// Success callback...
				this.upload = false;
			}, (error) => {
				this.upload = false;
			}, (event) => {
				// Progress callback...
				// event.detail.progress contains a number between 1 and 100 as the upload progresses
				this.upload = true;
				this.progress = event.detail.progress;
				this.redrawCircle();
			}, () => {
				this.upload = false;
			})
		}
	}
}

window.dragAndDrop = dragAndDrop;
