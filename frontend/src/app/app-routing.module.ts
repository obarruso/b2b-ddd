import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { RewardsComponent } from './components/rewards/rewards.component';
import { RewardDetailComponent } from './components/reward-detail/reward-detail.component';

const routes: Routes = [
  {
    path: '',
    component: RewardsComponent
  },
  {
    path: 'rewardsgit',
    component: RewardDetailComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
