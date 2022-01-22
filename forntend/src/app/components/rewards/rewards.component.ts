import { Component, OnInit } from '@angular/core';
import { RewardService } from '../../services/reward.service';
import { Reward } from '../../Reward';
import { faTimes } from '@fortawesome/free-solid-svg-icons';
@Component({
  selector: 'app-rewards',
  templateUrl: './rewards.component.html',
  styleUrls: ['./rewards.component.scss']
})
export class RewardsComponent implements OnInit {

  faTimes = faTimes;
  rewards: Reward[] = undefined;
  constructor(private rewardService: RewardService) { }

  ngOnInit(): void {
    this.getAllRewards();
  }

  private getAllRewards() {
    this.rewardService.getRewards().subscribe((data: any)=>{
      this.rewards = data.rewards;
      console.log(this.rewards);
    }
    );
  }

  private deleteReward(reward: Reward) {
    
  }
}
