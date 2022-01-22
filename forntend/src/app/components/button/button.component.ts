import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-button',
  templateUrl: './button.component.html',
  styleUrls: ['./button.component.scss']
})
export class ButtonComponent implements OnInit {
  @Output() btnClick = new EventEmitter();
  @Input() text!: string;
  @Input() color!: string;


  ngOnInit(): void {
  }

  onClick() {
    this.btnClick.emit();
  }
}
