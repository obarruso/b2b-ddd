import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {Observable} from 'rxjs';
import {Reward} from '../Reward';

@Injectable({
  providedIn: 'root'
})
export class RewardService {
  private getAll = 'http://localhost:8080/rewards';
  private remove = 'http://localhost:8080/reward/remove';
  constructor(private http: HttpClient) { }

  public getRewards(): Observable<Reward[]> {
    return this.http.get<Reward[]>(this.getAll);
  }

  public deleteReward(reward: Reward): Observable<Reward>
  {
    const url = `${this.remove}`;
    return this.http.delete<Reward>(url);
  }
}
