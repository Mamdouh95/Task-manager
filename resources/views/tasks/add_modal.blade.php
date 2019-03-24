<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Write the Task's name">
                    </div>
                    <div class="form-group">
                        <label for="select-member">Assign to</label>
                        <select name="user_id" class="form-control" id="select-member">
                            <option value="">Select a member</option>
                            @foreach($squad as $member)
                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" placeholder="Write the description" class="form-control" id="description" rows="3"></textarea>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="priority" id="exampleRadios1" value="{{ \App\Task::LOW_PRIORITY }}" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            {{ \App\Task::LOW_PRIORITY }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="priority" id="exampleRadios2" value="{{ \App\Task::MEDIUM_PRIORITY }}">
                        <label class="form-check-label" for="exampleRadios2">
                            {{ \App\Task::MEDIUM_PRIORITY }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="priority" id="exampleRadios3" value="{{ \App\Task::HIGH_PRIORITY }}">
                        <label class="form-check-label" for="exampleRadios3">
                            {{ \App\Task::HIGH_PRIORITY }}
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-url="{{ route('task.store') }}" id="addTask">Save changes</button>
            </div>
        </div>
    </div>
</div>