import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {Observable} from 'rxjs';
import {Reward} from '../Reward';

@Injectable({
  providedIn: 'root'
})
export class RewardService {
  private rewards = 'http://localhost:8080/rewards';
  constructor(private http: HttpClient) { }

  public getRewards(): Observable<Reward[]> {
    return this.http.get<Reward[]>(this.rewards);
  }

  public deleteReward(reward: Reward): Observable<Reward>
  {
    const url = `${this.rewards}`;
    return this.http.delete<Reward>(url);
  }
}
