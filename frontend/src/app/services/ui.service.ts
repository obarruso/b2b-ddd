import { Injectable } from '@angular/core';
import { Observable, Subject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class UiService {
  private showAddReward: boolean = false;
  private subject = new Subject<any>();

  constructor() { }

  toggleAddReward(): void
  {
    this.showAddReward = !this.showAddReward;
    this.subject.next(this.showAddReward);
  }

  onToggle(): Observable<any> {
    return this.subject.asObservable();
  }
}
