import { Component, OnInit, Input, EventEmitter, Output } from '@angular/core';
import { Reward } from '../../Reward';
import { faTimes } from '@fortawesome/free-solid-svg-icons';
@Component({
  selector: 'app-reward-item',
  templateUrl: './reward-item.component.html',
  styleUrls: ['./reward-item.component.scss']
})
export class RewardItemComponent implements OnInit {
  @Input() reward!: Reward;
  @Output() onDeleteReward: EventEmitter<Reward> = new EventEmitter();
  faTimes = faTimes;

  constructor() { }

  ngOnInit(): void {
  }

  onDelete(reward) {
    this.onDeleteReward.emit(reward);
  }
}
