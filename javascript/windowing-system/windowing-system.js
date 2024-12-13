// @ts-check

export function Size(width = 80, height = 60) {
  this.width = width
  this.height = height 
}

Size.prototype.resize = function(w, h) {
  this.width = w
  this.height = h
}

export function Position(x = 0, y = 0) {
  this.x = x
  this.y = y
}

Position.prototype.move = function(x, y) {
  this.x = x
  this.y = y
}

export class ProgramWindow {
  constructor() {
    this.screenSize = new Size(800, 600)
    this.size = new Size()
    this.position = new Position()
  }

  get max_resize_width() {
    return this.screenSize.width - this.position.x
  }

  get max_resize_height() {
    return this.screenSize.height - this.position.y
  }

  resize(new_size) {
    new_size.width = new_size.width > 1 ? new_size.width : 1
    new_size.height = new_size.height > 1 ? new_size.height : 1

    new_size.width = new_size.width < this.max_resize_width ? 
      new_size.width : this.max_resize_width
    new_size.height = new_size.height < this.max_resize_height ?
      new_size.height : this.max_resize_height
    
    this.size = new_size
  }

  get max_width() {
    return this.screenSize.width - this.size.width
  }
  
  get max_height() {
    return this.screenSize.height - this.size.height
  }
  
  move(new_position) {
    new_position.x = new_position.x > 0 ? new_position.x : 0
    new_position.y = new_position.y > 0 ? new_position.y : 0


    new_position.x = new_position.x < this.max_width ?
      new_position.x : this.max_width
    new_position.y = new_position.y < this.max_height ?
      new_position.y : this.max_height
    
    this.position = new_position
  }
}

export function changeWindow(old_window) {
  old_window.resize(new Size(400, 300))
  old_window.move(new Position(100, 150))
  return old_window
}