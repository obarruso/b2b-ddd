import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './components/header/header.component';
import { ButtonComponent } from './components/button/button.component';
import { RewardsComponent } from './components/rewards/rewards.component';
import { RewardItemComponent } from './components/reward-item/reward-item.component';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';
import { AddRewardComponent } from './components/add-reward/add-reward.component';
import { EditRewardComponent } from './components/edit-reward/edit-reward.component';
import { RewardDetailComponent } from './components/reward-detail/reward-detail.component';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    ButtonComponent,
    RewardsComponent,
    RewardItemComponent,
    AddRewardComponent,
    EditRewardComponent,
    RewardDetailComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FontAwesomeModule,
    HttpClientModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
