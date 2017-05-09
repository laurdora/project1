<?php
namespace Core\Services;
 
use Core\Repositories\ArticleRepository;
use Core\Validators\ArticleValidator;
use Prettus\Validator\LaravelValidator;

<p>
class ArticleService extends BaseService{
	/**
     * @var ArticleRepository
     */
    private $repo;
    /**
     * @var ArticleValidator
     */
    private $validator;
 
    /**
     * ArticleService constructor.
     * @param ArticleRepository $repo
     * @param ArticleValidator $validator
     */
    public function __construct(
        ArticleRepository $repo,
        ArticleValidator $validator
    ) {
        $this->repo = $repo;
        $this->validator = $validator;
    }
 
    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $this->validate($this->validator, LaravelValidator::RULE_CREATE, $data);
 
        return $this->repo->create($data);
    }
}
</p>