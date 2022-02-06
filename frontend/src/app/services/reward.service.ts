import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {Observable} from 'rxjs';
import {Reward} from '../Reward';

@Injectable({
  providedIn: 'root'
})
export class RewardService {
  private apiUrl = 'http://localhost:8080/rewards';
  constructor(private http: HttpClient) { }

  public getRewards(): Observable<Reward[]> {
    return this.http.get<Reward[]>(this.apiUrl);
  }

  public deleteReward(reward: Reward): Observable<Reward>
  {
    const url = `${this.apiUrl}/${reward.id}`;
    console.log(url);
    return this.http.delete<Reward>(url);
    
  }
}
