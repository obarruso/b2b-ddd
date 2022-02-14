import { Component, OnInit } from '@angular/core';
import { UiService } from '../../services/ui.service';
import { Subscription } from 'rxjs';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit {

  title: string = 'B2B frontend';
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

  toggleAddReward() {
    this.uiService.toggleAddReward();
  }

}
