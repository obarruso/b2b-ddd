import { Component, OnInit, Output, EventEmitter } from '@angular/core';
import { Reward } from '../../Reward';
import { UiService } from '../../services/ui.service';
import { Subscription } from 'rxjs';

@Component({
  selector: 'app-add-reward',
  templateUrl: './add-reward.component.html',
  styleUrls: ['./add-reward.component.scss']
})
export class AddRewardComponent implements OnInit {
  @Output() onAddReward: EventEmitter<Reward> = new EventEmitter();
  saleDate: string;
  client: string;
  product: string;
  paid: number;
  toPay: number;
  incident: string;
  showAddReward: boolean;
  subscription: Subscription;

  constructor(private uiService: UiService) {
    this.subscription = this.uiService.
    onToggle().
    subscribe(
      (value) => (this.showAddReward = value)
    );
  }

  ngOnInit(): void {
  }

  onSubmit() {
    if (!this.saleDate) {
      alert('Please add a date');
      return;
    }
    const newReward = {
      saleDate: this.saleDate,
      client: this.client,
      product: this.product,
      paid: this.paid,
      toPay: this.toPay,
      incident: this.incident
    }
    this.onAddReward.emit(newReward);
    this.saleDate = '';
    this.client = '';
    this.product = '';
    this.paid = null;
    this.toPay = null;
    this.incident = '';

  }

}
