<?php
/*
 * (c) MajPanel <https://github.com/MajPanel/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Form\MajPanel;

use Symfony\Component\Validator\Validation;

/**
 * @author Majid Kazerooni <support@majpanel.com>
 */
abstract class AbstractValidate
{

    private $validateManager;
    private $requestData;
    private $constraint;

    public function __construct(array $requestData)
    {
        $this->requestData = $requestData;
        $this->validateManager = Validation::createValidator();
    }

    /**
     * @param $constraint
     * @param $groups
     *
     * @return array[]
     */
    protected function setValidate($constraint, $groups)
    {
        $messageError = [];
        $values = [];
        $violations = $this->validateManager->validate($this->requestData, $constraint, $groups);
        foreach ($violations as $violation) {
            $messageError[] = array('nameProperty' => $violation->getPropertyPath(), 'message' => $violation->getMessage(), 'value' => $violation->getInvalidValue());
        }
        return ['Error' => $messageError, 'values' => $values];


    }
}
