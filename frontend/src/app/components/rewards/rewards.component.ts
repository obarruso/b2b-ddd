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

  getAllRewards() {
    this.rewardService.getRewards().subscribe((data: any)=>{
      this.rewards = data.rewards;
      console.log(this.rewards);
    }
    );
  }

  deleteReward(reward: Reward) {
    this.rewardService
    .deleteReward(reward)
    .subscribe(
      ()=>{
        this.rewards = this.rewards.filter((r) => r.id !== reward.id);
        console.log(this.rewards);
      }
    );
  }
  addReward(reward: Reward) {
    this.rewardService.addReward(reward).subscribe(
      (reward)=>
        (
          this.rewards.push(reward)
        )
    );
  }
}
